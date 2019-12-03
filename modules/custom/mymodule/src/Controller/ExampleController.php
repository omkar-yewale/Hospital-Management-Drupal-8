<?php
    namespace Drupal\mymodule\Controller;
    use Drupal\Core\Controller\ControllerBase;
     
    class ExampleController extends ControllerBase {
      public function content() {
        $query = \Drupal::entityQuery('node');
        $query->condition('status', 1);
        $query->condition('type', 'healthcare');
        $entity_ids = $query->execute();
        $details=array();
        foreach ($entity_ids as $key => $value) 
        {
             // print_r($value);
            $data = node_load($value);
            $text = $data->get('title')->value;
            $imageUrl = $data->get('field_img')->entity->uri->value;
            // print_r($text);
            // print_r($imageUrl);
            $image = file_create_url($imageUrl);
            // echo '<img src="'.$image.'">';
           
            $linkUrl = $data->get('field_link')->uri;
            // $url = $data->field_my_link->uri;
            // $link = file_create_url($linkUrl);

            $atr .= '<div class="col-sm-3" style="background-color:lavender;">
                      <h2>'.$text.'</h2>
                      <a href="'.$linkUrl.'">
                        <img src="'.$image.'">
                      </a>
                      </div>';

        }
            $demo= '<div class="container-fluid">
                    <h1>Health Care (You Can Calculate BMI and BMR Free)</h1>
                    <p><strong>Body Mass Index (BMI)</strong> is a measurement of a person’s weight with respect to his or her height. It is more of an indicator than a direct measurement of a person’s total body fat.BMI, more often than not, correlates with total body fat. This means that as the BMI score increases, so does a person’s total body fat.</p>
                    <p><strong> Basal metabolic rate (BMR) </strong>is often used interchangeably with resting metabolic rate (RMR). While BMR is a minimum number of calories required for basic functions at rest, RMR — also called resting energy expenditure (REE) — is the number of calories that your body burns while it’s at rest.</p>
                    <div class="row">
                      '.$atr.'
                    </div>
                  </div>';

        return array(
          '#type' => 'markup',
          '#markup' => $demo,
        );
      }
    }