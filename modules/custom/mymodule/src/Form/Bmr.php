<?php
/**
*@file
*Contains \Drupal\mymodule\Form\form.
*/
namespace Drupal\mymodule\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\HttpFoundation\Request;

class Bmr extends FormBase
{
	public function getFormID()
	{
		return 'bmr';
	}
	public function buildForm(array $form,FormStateInterface $form_state)
	{
		$form['bmr'] = [
  			'#type' => 'label',
  			'#title' => $this->t('Calculate BMR'),
			];
		$form['enter_gender'] = [
			'#type' => 'radios',
			'#title' => $this->t('Gender:'),
			'#options' => ['Male' => 'Male', 'Female' => 'Female'],
			'#default_value' => 'Male',
			'#requried' => TRUE,
		];
		$form['enter_age'] = [
			'#type' => 'number',
			'#title' => $this->t('Enter Age:'),
			'#placeholder' => $this->t('In Age In Years'),
			'#requried' => TRUE,
		];
		$form['enter_height'] = [
			'#type' => 'number',
			'#title' => $this->t('Enter Height:'),
			'#placeholder' => $this->t('In feet and inches'),
			'#step' => 0.1,
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
		$form['enter_excercies'] = [
			'#type' => 'select',
			'#title' => $this->t('Gender:'),
			'#options' => [ '1' => $this->t('No exercise'),
							'2' => $this->t('1-3 days'),
							'3' => $this->t('3-5 days'),
							'4' => $this->t('6-7 days'),
							'5' => $this->t('Physical Job')],
			'#default_value' => '1',
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
		$age = $form_state->getValue('enter_age');
		$gender = $form_state->getValue('enter_gender');
		$height = $form_state->getValue('enter_height');
		$weight = $form_state->getValue('enter_weight');
		$excercies = $form_state->getValue('enter_excercies');
		$cm = round($height * 30.48);
		$bmr= (10*$weight) + (6.25*$cm) - (5*$age);
		if ($gender=="Male") {
			$bmr= $bmr+5;
			# code...
		}
		else{
			$bmr= $bmr-161;
		}
		dsm("Your BMR Is:"." ".round($bmr));
		if($excercies == '1')
		{
			$calories = $bmr*1.2;
			dsm("Maintenance Calories per day Is:"." ".round($calories));
		}
		elseif($excercies == '2')
		{
			$calories = $bmr*1.375;
			dsm("Maintenance Calories per day Is:"." ".round($calories));
		}
		elseif($excercies == '3')
		{
			$calories = $bmr*1.55;
			dsm("Maintenance Calories per day Is:"." ".round($calories));
		}
		elseif($excercies == '4')
		{
			$calories = $bmr*1.725;
			dsm("Maintenance Calories per day Is:"." ".round($calories));
		}
		elseif($excercies == '5')
		{
			$calories = $bmr*1.9;
			dsm("Maintenance Calories per day Is:"." ".round($calories));
		}
		// $val = $height+$weight;

	

	}
}