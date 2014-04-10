<?php namespace Dashboard\Html;

use Illuminate\Html\FormBuilder as BaseFormBuilder;


class FormBuilder extends BaseFormBuilder {

    private $defaultOptions = array(
        'wrapClass' => '',
        'type' => 'text',
        'label' => '',
        'labelClass' => '',
        'divClass' =>'',
        'inputClass' =>'',
        'id' => '',
        'placeholder' => '',
        'value' => '',
        'extra' => ''
    );

    
    public function textInput( $colName, $options = array() )
    {
        return $this->generateInput( $colName, $options, 'text' );
    }

    private function generateInput( $colName, $options, $type )
    {
        # Set up the options & extract
        $options = $this->setOptions( $colName, $type, $options );
        extract($options);

        # Set up the label
        $html = '<label for="' . $colName . '" class="' . $labelClass . '">' . $label . '</label>';
        
        # Set up the input 
        $html .= '<div class="' . $divClass . '">';
        $html .= '<input type="' . $type . '" class="form-control ' . $inputClass . '" ';
        $html .= 'id="' . $id . '" placeholder="' . $placeholder . '" value="' . $value . '" ';
        $html .= $extra .' ></div>';

        # Wrap in a div & return
        $html = '<div class="form-group ' . $wrapClass . '">' . $html . '</div>';

        return $html;
        
    }

    private function setOptions( $colName, $type, $options )
    {
        # Set up default options
        $humanColName = str_replace('_', ' ', $colName);
        $this->defaultOptions['type'] = $type;
        $this->defaultOptions['label'] = ucwords( $humanColName );
        $this->defaultOptions['id'] = $colName;
        $this->defaultOptions['placeholder'] = 'Enter '. $humanColName;
        // dump($options, 1);
        # Add in any passed options
        return array_merge($this->defaultOptions, $options);
    }


}
/*
<div class="form-group">
    
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password"$html class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  */