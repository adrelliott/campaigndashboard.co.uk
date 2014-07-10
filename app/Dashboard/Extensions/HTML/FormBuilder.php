<?php namespace Dashboard\Html;

use Illuminate\Html\FormBuilder as BaseFormBuilder;
use Config;
use Auth;
use Session;

class FormBuilder extends BaseFormBuilder {

    /**
     * Default options for the input. (Overide in client_config file)
     * @var array
     */
    protected $defaultConfig = array(
        'wrapClass' => 'form-group',
        'responsiveClass' => 'col-lg-12 col-md-12 col-sm-12  col-xs-12',
        'labelClass' => '',
        'inputClass' => '',
        'extra' => '',
        'helpBlock' => FALSE,
        'checked' => FALSE,
        'inputAttributes' => array(),
        'value' => null,
        'type' => 'text',

    );


    /**
     * Contains the configuration for this field
     * @var array
     */
    protected $config = array();

    /**
     * Th col name of the field
     * @var string
     */
    protected $name = '';


    /**
     * Generates the input and surrounding markup for twitter bootstrap
     * @param  string  $name    The type of field to generate
     * @param  array  $options Overide the config options
     * @param  mixed $defaultValue   Pass a to overide the config value (note, model values supercede all passed values)
     * @return string           The HTML of the Bootstrap element
     */
    public function inputBS($name, $config, $defaultValue = FALSE)
    {
        # Set up defaults
        $this->name = $name;
        $this->setConfig( $config, $defaultValue );

        # Overwrite the default value with one in the session/model, if set
        if ( $value = $this->getValueAttribute($this->name) ) $this->config['value'] = $value;

        # Check for validation errors & set relevant classes/warnings
        $this->getErrors();

        # Get label and input tag 
        $html = $this->{$this->config['type'] . 'BS'}($this->config['value']);

        # Add help block if passed
        if ( $this->config['helpBlock'] != FALSE )
            $html .= '<span class="help-block"><em>' . $this->config['helpBlock'] . '</em></span>';

         # Wrap in a div, if its defined in the config
        $html = $this->getDivWrap($html, 'wrapClass');
        
        # Wrap in a responsive div, if its defined in the config
        $html = $this->getDivWrap($html, 'responsiveClass');

        return $html;
    }
    

    public function checkboxBS($value)
    {
        return $this->checkboxRadioBS($value, 'checkbox');
    }
    
    public function radioBS($value)
    {
        return $this->checkboxRadioBS($value, 'radio');
    }

    public function emailBS($value)
    {
        return $this->textBS($value, 'email');
    }
    public function hiddenBS($value)
    {
        return $this->textBS($value, 'hidden');
    }
    public function passwordBS($value)
    {
        return $this->textBS($value, 'password');
    }
    public function fileBS($value)
    {
        return $this->textBS($value, 'file');
    }

    public function datetimeBS($value)
    {
        return $this->textBS($value, 'datetime');
    }
   
    public function dateBS($value)
    {
        return $this->textBS($value, 'date');
    }
   
    public function monthBS($value)
    {
        return $this->textBS($value, 'month');
    }
   
    public function timeBS($value)
    {
        return $this->textBS($value, 'time');
    }
   
    public function weekBS($value)
    {
        return $this->textBS($value, 'week');
    }
   
    public function numberBS($value)
    {
        return $this->textBS($value, 'number');
    }

    public function urlBS($value)
    {
        return $this->textBS($value, 'url');
    }

    /**
     * Creates a text input tag
     * @param  mixed $value     The value of the input field
     * @return string           The complete HTML for an input tag
     */
    public function textBS($value, $type = 'text')
    {
        # Generate the label tag
        $input = $this->getLabelBS($this->config['label']);

        # generate the input tag
        $input .= $this->input($type, $this->name, $value, $this->getAttributes());

        return $input;
    }

    /**
     * Creates a textarea tag
     * @param  mixed $value     The value of the textarea field
     * @return string           The complete HTML for an textarea tag
     */
    public function textareaBS($value)
    {
        # Generate the label tag
        $input = $this->getLabelBS($this->config['label']);

        # Generate the input
        $input .= $this->textarea($this->name, $value, $this->getAttributes());
        
        return $input;
    }

    /**
     * Creates a select tag
     * @param  mixed $value     The value of the select field
     * @param  boolean          Set to TRUE to make this is a multiple select tag
     * @param  array            Override the options for the select dropdown
     * @return string           The complete HTML for an select tag
     */
    public function selectBS($value, $multiple = NULL, $list = array())
    {
        # Set up the 'select' tag
        if ( $multiple != NULL ) $multiple = 'multiple';
        
        # Set up the drop down options
        $list = $this->getOptions();
        
        # Generate the label tag
        $input = $this->getLabelBS($this->config['label']);

        # generate the select tag
        $input .= $this->select($this->name, $list, $value, $this->getAttributes());

        return $input;
    }

    /**
     * Generates a set of textboxes or radio buttons
     * @param  mixed $value The value to overide
     * @param  string $type  Either 'radio' or 'checkbox'
     * @return string        The HTML of the input(s)
     */
    public function checkboxRadioBS($value, $type)
    {
        $checkboxes = array();
        $input = '';

        # Get the list of options
        $list = $this->getOptions();

        # Cycle through the options and create each 
        foreach ( $list as $value => $label )
            $checkboxes[] = $this->{$type}($this->name, $value, NULL, $this->getAttributes(FALSE)) . ' ' . $label;

        # If labelClass != checbx-inline, then wrap each in a div.checkbox
        foreach ( $checkboxes as $checkbox )
        {
            $checkbox = $this->getLabelBS($checkbox);
            
            # Inline checkboxes don't get a surrounding div
            if ( $this->config['labelClass'] != $type . '-inline' )
            {
                $checkbox = '<div class="' . $type . '">' . $checkbox . '</div>';
            }

            $input .= $checkbox;
        }
        
        return $input;
    }
    







    /**
     * Gets the options for a drop down, or radio/checkbox set
     * @return array The array of options for the dropdown/radio/checklist
     */
    public function getOptions()
    {
        # is it set in the config array?
        if (  ! isset($this->config['options']) )
            return array();
        else $list = $this->config['options'];

        # Is it an array?
        if ( is_array($list) )
            return $list;

        # Check to see if there is a dropdown with this index. if not, set $list to empty array
        $list = Config::get('client_config/' . Auth::user()->user()->owner_id . '.dropdowns.' . $list, array());

        return $list;
    }

    public function getErrors()
    {
        $errors = Session::get('errors', new \Illuminate\Support\MessageBag);
        $messages = array();
        
        # Test for messages
        if ( ! $errors->has($this->name) )
            return;

        # Create the help text
        foreach ( $errors->get($this->name, '<li><i class="fa fa-exclamation-triangle"></i> :message</li>') as $message )
        {
            $messages[] = $message;
        }
        $this->config['helpBlock'] = '<ul class="errors">' . join('', $messages) . '</ul>';

         # Set the class on the input
        $this->config['wrapClass'] .= ' has-error  has-feedback ';

        return;
    }

    /**
     * Sets the label, if passed
     * @param  string $label The label, or in the case of checkboxes, the input
     * @return string        The markup for the label
     */
    public function getLabelBS($label)
    {
        if ( $label )
        {
            return '<label for="' . $this->name . '" class="control-label ' . $this->config['labelClass'] . '">' . $label . '</label>';
        }
        else return '';
    }

    /**
     * Wraps the current HTML in a div, if its defined in config
     * @param string $type The index of the $this->config array we are targetting
     */
    public function getDivWrap($html, $type)
    {
        if ( $this->config[$type] != FALSE )
        {
            return '<div class="' . $this->config[$type] . '" ' . $this->getId($type) . '>' . $html . '</div>';
        }
        else return $html;
    }

    public function getId($type)
    {
        # Set up an Id if its a wrap class
        if ( $type == 'wrapClass' ) return ' id="' . $this->name . '" ';
    }

    /**
     * Adds 'form-control' to html attributes, if passed, for the <input> tag
     * @param boolean $addFormControl Defaults to adding class of 'form-control'
     */
    public function getAttributes($addFormControl = TRUE)
    {
        $attr = $this->config['inputAttributes'];

        # If we have passed false, just return the array
        if ( ! $addFormControl ) return $attr;


        # Else, add in the attribute 'form-control'
        if ( isset($attr['class']) ) $attr['class'] .= ' form-control';
        else $attr['class'] = 'form-control';

        return $attr;
    }


    /**
     * Takes the options set in client config and overrides the defaults 
     * (plus sets up a few handy defaults)
     * @param array $options The new otions defined in this field's 'config' index
     */
    public function setConfig($config, $value )
    {
        # Set defaults
        $this->config = $this->defaultConfig;
        $humanInputName = str_replace('_', ' ', $this->name);

        # Update the default values
        $this->config['label'] = ucwords($humanInputName);
        $this->config['inputAttributes']['placeholder'] = 'Enter ' . $humanInputName;

        # Override with any options passed in 'config' index
        $this->config = array_merge($this->config, $config);

        # Allow the passed value to take priority over everything
        if ( $value != FALSE ) $this->config['value'] = $value;
    }

    


}