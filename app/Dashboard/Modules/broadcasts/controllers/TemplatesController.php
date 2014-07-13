<?php namespace Dashboard\Broadcasts;

use CrudController;
use Dashboard\Repositories\TemplateRepositoryInterface as ModelInterface;
use Dashboard\Broadcasts\EmailTemplatesInterface;
use Auth;

class TemplatesController extends CrudController {

    /**
     * The object that controlls templates in the 3rd part mailer
     * @var onj
     */
    protected $templates;

    protected $arrayMap = array(
        'id' => 'mailchimp_id',
        'name' => 'template_name',
        'preview_image' => 'template_thumbnail',
        // 'category' => 'template_category',
        // 'layout' => '',
        // 'date_created' => '',
        // 'active' => 'active',
        // 'edit_source' => '',
        // 'folder_id' => '',
    );

    public function __construct(ModelInterface $repo, EmailTemplatesInterface $templates)
    {
        parent::__construct($repo);
        $this->templates = $templates;
    }

    /**
     * Searches for the templates in the Mailer (usually MailChimp) and 
     * overwrites any stored in this local database
     * @return [type] [description]
     */
    public function syncTemplates()
    {
        // Get templates from Mailer
        $mailerTemplates = $this->listTemplates();

        // Soft-Delete all current templates for this Tenant
        $deleted = $this->repo->deleteAllTenantsRecords();

        // Match names & add new templates
        $input = array();

        // Loop through each template and convert it ready for insertion
        // into our DB 
        foreach ( $mailerTemplates as $index => $array )
        {
            foreach ( $array as $k => $v )
            {
                if ( isset($this->arrayMap[$k]) )
                {
                    $rowName = $this->arrayMap[$k];
                    $input[$index][$rowName] = $v;
                }
            }

            $input[$index]['owner_id'] = Auth::user()->owner_id;
        }

        // Now bulk add
        $inserted = $this->repo->insert($input);
    }

    public function listTemplates()
    {
        $templates = $this->templates->listTemplates();
        return $templates;
        // @TODO: Try and catch
    }
}