<?php
/**
*@file
*Contains \Drupal\mymodule\Form\form.
*/
namespace Drupal\mymodule\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\HttpFoundation\Request;

class Cal extends FormBase
{
	public function getFormID()
	{
		return 'cal';
	}
	public function buildForm(array $form,FormStateInterface $form_state)
	{
		$form['advanced'] = [
  			'#type' => 'label',
  			'#title' => $this->t('Calculate BMI'),
			];
		$form['enter_height'] = [
			'#type' => 'number',
			'#title' => $this->t('Enter Height:'),
			'#placeholder' => $this->t('In feet and inches'),
			'#step' => 0.0,
			'#requried' => TRUE,
		];
		$form['enter_weight'] = [
			'#type' => 'number',
			'#title' => $this->t('Enter Weight:'),
			'#placeholder' => $this->t('In Kg'),
			 // 'precision' => 5, 
  		// 	'scale' => 2, 
			'default' => 0.0,
			'#requried' => TRUE,
		];
    	$form['submit'] = [
      		'#type' => 'submit',
      		'#value' => $this->t('Calculate'),
      	];

		return $form;
	}
	public function submitForm(array &$form,FormStateInterface $form_state)
	{
		// foreach ($form_state->getValues() as $key => $value) 
		// {
  //    		drupal_set_message($key . ': ' . $value);
		// }
		$height = $form_state->getValue('enter_height');
		$weight = $form_state->getValue('enter_weight');
		$cm = 3.2808;
		$tem = $height / $cm;
		$tem = $tem * $tem;
		$temp = $weight / $tem;
		// $val = $height+$weight;
		if($temp<15)
			dsm(round($temp,2)." "."Very severely underweight");
		else if($temp<=15)
			dsm(round($temp,2)." "."Severely underweight");
		else if($temp<=16)
			dsm(round($temp,2)." "."Underweight");
		else if($temp<=18.5)
			dsm(round($temp,2)." "."Normal (healthy weight)");
		else if($temp<=25)
			dsm(round($temp,2)." "."Overweight");
		else if($temp<=30)
			dsm(round($temp,2)." "."Obese Class I (Moderately obese)");
		else if($temp<=35)
			dsm(round($temp,2)." "."Obese Class II (Severely obese)");
		else if($temp<=40)
			dsm(round($temp,2)." "."Obese Class III (Very severely obese)");
		else if($temp<=45)
			dsm(round($temp,2)." "."Obese Class IV (Morbidly obese)");
		else if($temp<=50)
			dsm(round($temp,2)." "."Obese Class V (Super obese)");
		else if($temp<=60)
			dsm(round($temp,2)." "."Obese Class VI (Hyper obese)");
	

	}
}