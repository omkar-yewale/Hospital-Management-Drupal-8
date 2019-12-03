<?php
/**
*@file
*Contains \Drupal\mymodule\Form\form.
*/
namespace Drupal\mymodule\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\HttpFoundation\Request;

class Body extends FormBase
{
	public function getFormID()
	{
		return 'body';
	}
	public function buildForm(array $form,FormStateInterface $form_state)
	{
		$form['body'] = [
  			'#type' => 'label',
  			'#title' => $this->t('Calculate Body Type'),
			];
		$form['enter_bust'] = [
			'#type' => 'number',
			'#title' => $this->t('Enter Bust Size:'),
			'#step' => 0.1,
			'#placeholder' => $this->t('In Centemeter'),
			'#requried' => TRUE,
		];
		$form['enter_waist'] = [
			'#type' => 'number',
			'#title' => $this->t('Enter waist size:'),
			'#step' => 0.1,
			'#placeholder' => $this->t('In Centemeter'),
			'#requried' => TRUE,
		];
		$form['enter_high'] = [
			'#type' => 'number',
			'#title' => $this->t('Enter High Hip Size:'),
			'#step' => 0.1,
			'#placeholder' => $this->t('In Centemeter'),
			'#requried' => TRUE,
		];
		$form['enter_hip'] = [
			'#type' => 'number',
			'#title' => $this->t('Enter Hip Size:'),
			'#step' => 0.1,
			'#placeholder' => $this->t('In Centemeter'),
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
		
		$bust = $form_state->getValue('enter_bust');
		$waist = $form_state->getValue('enter_waist');
		$high = $form_state->getValue('enter_high');
		$hips = $form_state->getValue('enter_hip');
		
		if(($bust - $hips) <= 1 AND ($hips - $bust) < 3.6 AND ($bust - $waist) >= 9 OR ($hips - $waist) >= 10)
		{
			dsm("Body Shape is:"." "."Hourglass");
		}
		elseif(($hips - $bust) >= 3.6 AND ($hips - $bust) < 10 AND ($hips - $waist) >= 9 AND ($high/$waist) < 1.193)
		{
			dsm("Body Shape is:"." "."Bottom Hourglass");
		}
		elseif(($bust - $hips) > 1 AND ($bust - $hips) < 10 AND ($bust - $waist) >= 9)
		{
			dsm("Body Shape is:"." "."Top Hourglass");
		}
		elseif(($hips - $bust) > 2 AND ($hips - $waist) >= 7 AND ($high/$waist) >= 1.193)
		{
			dsm("Body Shape is:"." "."Spoon");
		}
		elseif(($hips - $bust) >= 3.6 AND ($hips - $waist) < 9)
		{
			dsm("Body Shape is:"." "."Triangle");
		}
		elseif(($bust - $hips) >= 3.6 AND ($bust - $waist) < 9)
		{
			dsm("Body Shape is:"." "."Inverted triangle");
		}
		elseif(($hips - $bust) < 3.6 AND ($bust - $hips) < 3.6 AND ($bust - $waist) < 9 AND ($hips - $waist) < 10)
		{
			dsm("Body Shape is:"." "."Rectangle");
		}
	}
}