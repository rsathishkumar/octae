<?php
/**
 * @file
 * Contains \Drupal\quicktabs\Controller\QuickTabsController.
 */

namespace Drupal\octae_submissions\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Serialization\Yaml;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\Node;
use Drupal\webform\WebformInterface;
use Drupal\webform\Plugin\WebformHandlerBase;
use Drupal\webform\webformSubmissionInterface;
use Drupal\webform\Entity\WebformSubmission;


class WebformController extends ControllerBase {

  public static function custom_submit_handler(&$form, FormStateInterface $form_state) {

    $reason = $form_state->getValue('your_reason_for_contacting_us');
    $full_name = $form_state->getValue('full_name');
    $email = $form_state->getValue('contact_email');
    $link_to_resource = $form_state->getValue('link_to_resource');
    $about_the_partnership = $form_state->getValue('about_the_partnership');
    $impact = $form_state->getValue('impact');
    $attach_a_file = $form_state->getValue('attach_a_file');
    $comments = $form_state->getValue('comments');
    $overview_of_the_story = $form_state->getValue('overview_of_the_story');
    $supporting_information_links = $form_state->getValue('supporting_information_links');
    $resource_type = $form_state->getValue('resource_type');

    if($reason == 'story_submission') {
      // Create the node.
      $node = Node::create([
        'type' => 'success_stories',
        'status' => FALSE,
        'title' => 'Success story',
        'field_about_the_partnership' => $about_the_partnership,
        'field_comments' => $comments,
        'field_contact_email' => $email,
        'field_full_name' => $full_name,
        'field_impact' => $impact,
        'field_overview_of_the_story' => $overview_of_the_story,
        'field_supporting_infor_link' => ['uri' => $supporting_information_links],
      ]);
      // Save the node.
      $node->save();
    }
    else if ($reason == 'resource_submission') {
      $node = Node::create([
        'type' => 'resource_submission',
        'status' => FALSE,
        'title' => 'Resources',
        'field_attach_a_file' => ['target_id' => $attach_a_file],
        'field_comments' => $comments,
        'field_contact_email' => $email,
        'field_full_name' => $full_name,
        'field_supporting_infor_link' => ['uri' => $link_to_resource],
        'field_resource_type' => $resource_type
      ]);
      // Save the node.
      $node->save();
    }
  }
}