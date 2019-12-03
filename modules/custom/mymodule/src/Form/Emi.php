<?php
/**
*@file
*Contains \Drupal\mymodule\Form\form.
*/
namespace Drupal\mymodule\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\HttpFoundation\Request;

class Emi extends FormBase
{
	public function getFormID()
	{
		return 'emi';
	}
	public function buildForm(array $form,FormStateInterface $form_state)
	{
		$form['emi'] = [
  			'#type' => 'label',
  			'#title' => $this->t('Calculate Monthly Emi'),
			];
		$form['enter_principal_amount'] = [
			'#type' => 'number',
			'#title' => $this->t('Enter Amount:'),
			'#step' => 5000,
			'#default_value' => '5000',
			'#requried' => TRUE,
		];
		$form['enter_intrest_rate'] = [
			'#type' => 'number',
			'#title' => $this->t('Enter Intrest Rate:'),
			'#step' => 0.1,
			'#placeholder' => $this->t('In Percentage'),
			'#requried' => TRUE,
		];
		$form['enter_year'] = [
			'#type' => 'number',
			'#title' => $this->t('Enter year:'),
			'#placeholder' => $this->t('In Years'),
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
		$principal = $form_state->getValue('enter_principal_amount');
		$intrest = $form_state->getValue('enter_intrest_rate');
		$years = $form_state->getValue('enter_year');
		
		$years = $years * 12;
		$intrest = $intrest / (12 * 100);

		$emi = ($principal * $intrest * pow(1 + $intrest, $years)) /  
                  (pow(1 + $intrest, $years) - 1); 
		
		dsm("Payable Intrest Is:"." ".round($emi));

		

	}
}