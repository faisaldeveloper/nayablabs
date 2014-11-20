<?php
/**
 *## BootstrapCode class file.
 *
 * @author Christoffer Niska <ChristofferNiska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2011-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */

Yii::import('gii.generators.crud.CrudCode');

/**
 *## Class BootstrapCode
 *
 * @package booster.gii
 */
class BootstrapCode extends CrudCode
{
	public function generateActiveRow($modelClass, $column)
	{
		if ($column->type === 'boolean') {
			return "\$form->checkBoxRow(\$model,'{$column->name}')";
		} else if (stripos($column->dbType, 'text') !== false) {
			return "\$form->textAreaRow(\$model,'{$column->name}',array('rows'=>6, 'cols'=>50, 'class'=>'span8'))";
		} 
		else if($column->isForeignKey){
			 return "\$form->{dropDownListRow}(\$model, '{$column->name}', CHtml::listData(Country::model()->findAll(), 'id', 'name'))";	
		}
		else if (strtoupper($column->dbType) == 'DATE' || strtoupper($column->dbType) == 'datetime') {
			return "\$form->datepickerRow(
			'model' => \$model,
			'{$column->name}',
			//'value' => \$model->{$column->name},
			array(
				'options' => array('language' => 'en','width'=>'80px','format'=>'dd-mm-yyyy',\"autoclose\"=>true),
	 'style'=>'width:80px',
			)
			
			//'hint' => 'Click inside! This is a super cool date field.',
			'placeholder'=>'dd-mm-yyyy',
    		'prepend' => '<i class=\"icon-calendar\"></i>'
			);\n";
		} 
		else {
			if (preg_match('/^(password|pass|passwd|passcode)$/i', $column->name)) {
				$inputField = 'passwordFieldRow';
			} else {
				$inputField = 'textFieldRow';
			}

			if ($column->type !== 'string' || $column->size === null) {
				return "\$form->{$inputField}(\$model,'{$column->name}',array('class'=>'span5'))";
			} else {
				return "\$form->{$inputField}(\$model,'{$column->name}',array('class'=>'span5','maxlength'=>$column->size))";
			}
		}
	}
}
