<?php namespace Dashboard\Mailers;

/**
 * When you want to send emails, you should create a mailer class. I think the convention
 * should be 
 */
class BaseMailer
{
    public function __call($method, $params)
    {
        if (starts_with($method, 'send'))
            throw new Exception("Unknown method " . get_class($this) . '@' . $method);

        $method = substr($method, 4);

        Mail::send($this->getView($method), $data, function($message) use ($this, $method, $params)
        {
            array_unshift($params, $message);
            call_user_func_array(array($this, $method), $params);
        });
    }

    protected function getView($method)
    {
        if (Auth::user()->user())
            $ownerId = Auth::user()->user()->owner_id;
        elseif (Auth::clientLogin()->user())
            $ownerId = Auth::clientLogin()->user()->owner_id;
        else
            $ownerId = 'defaults';

        $filePath = 'mailers.' . snake_case(get_class($this)) . '.defaults.' . $method;

        if ($ownerId)
        {
            $customFilePath = str_replace('defaults', $ownerId, $filePath);

            # If file exists in tenants dir, load that, otherwise load default
            if ( View::exists( $customFilePath ) ) $filePath = $customFilePath;
        }

        return $filePath;
    }
}