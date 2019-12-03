<?php

namespace Drupal\Tests\gender\Functional;

use Behat\Mink\Element\NodeElement;
use Drupal\Core\Url;

/**
 * Tests the default gender field widget.
 *
 * @group gender
 */
class GenderDefaultWidgetTest extends GenderTestBase {

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = [
    'gender',
    'gender_test',
    'node',
    'user',
    'field_ui',
    'help',
  ];

  /**
   * Tests that the widget displays selected values properly.
   */
  public function testSelectListWidget() {
    // Create the URL to the node edit page.
    $node_edit_url = Url::fromRoute('entity.node.edit_form', [
      'node' => $this->node->id(),
    ]);
    // Load the node edit page.
    $this->drupalGet($node_edit_url);
    $widget = $this->getWidget();
    $this->assertWidgetOptions($widget, $this->genderList);
    // Add a fourth option.
    $fourth_option = 'aporagender';
    // Select the fourth option.
    $widget->selectOption($fourth_option, TRUE);
    $this->genderList[] = $fourth_option;
    // Save the form.
    $this->getSession()->getPage()->findButton('Save')->click();
    $this->drupalGet($node_edit_url);
    $widget = $this->getWidget();
    $this->assertWidgetOptions($widget, $this->genderList);
  }

  /**
   * Get the select widget element.
   *
   * @return \Behat\Mink\Element\NodeElement
   *   The select widget element.
   */
  protected function getWidget() {
    // Assert that the widget exists.
    $widget = $this->assertSession()->elementExists('css', 'select[name="field_gender[]"]');
    $this->assertNotEmpty($widget);

    return $widget;
  }

  /**
   * Asserts that the options in the widget are as expected.
   *
   * @param \Behat\Mink\Element\NodeElement $widget
   *   The widget element.
   * @param array $expected_values
   *   An array of values expected to be found in the widget.
   */
  protected function assertWidgetOptions(NodeElement $widget, array $expected_values) {
    // Get all of the possible gender options.
    $gender_options = array_keys(gender_options());
    // Get all of the options from the widget.
    $options = $widget->findAll('css', 'option');
    $option_values = [];
    $selected_values = [];
    /** @var \Behat\Mink\Element\NodeElement $option */
    foreach ($options as $option) {
      $this->assertNotEmpty($option);
      // Get the value from the option.
      $option_value = $option->getAttribute('value');
      $this->assertNotEmpty($option_value);
      if ($option_value == '_none') {
        continue;
      }
      $option_values[] = $option_value;
      // Assert that the selected options all exist in the original list of
      // genders used to create the node.
      if (!empty($option->getAttribute('selected'))) {
        $this->assertTrue(in_array($option_value, $expected_values));
        $selected_values[] = $option_value;
      }
      // Assert that the only options in the widget are the expected options.
      $this->assertTrue(in_array($option_value, $gender_options));
    }
    // Assert that all of the options in the original list of genders used to
    // create the node were selected. Sort the lists first so all of the values
    // are in the same order.
    sort($expected_values);
    sort($selected_values);
    $this->assertTrue($expected_values == $selected_values);
    // Assert that the gender options all exist in the widget.
    foreach ($gender_options as $gender_option) {
      $this->assertTrue(in_array($gender_option, $option_values));
    }
  }

}
