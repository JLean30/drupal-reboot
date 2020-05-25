<?php

namespace Drupal\cargar_css_y_js\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class CargarCssYJsController.
 */
class CargarCssYJsController extends ControllerBase {

  /**
   * Index.
   *
   * @return string
   */
  public function index() {

    $items = [
      [
        'title' => $this->t('title 1'),
        'description' => $this->t('Bacon ipsum dolor amet jerky fatback porchetta, pork belly sirloin bresaola t-bone burgdoggen kielbasa picanha buffalo. Fatback kielbasa pastrami, meatball chislic pork venison cupim ribeye jerky tri-tip tongue. Strip steak shoulder biltong, salami cupim burgdoggen capicola fatback. Frankfurter sausage pork chop tongue chicken.')
      ],
      [
        'title' => $this->t('title 2
        '),
        'description' => $this->t('Bacon ipsum dolor amet jerky fatback porchetta, pork belly sirloin bresaola t-bone burgdoggen kielbasa picanha buffalo. Fatback kielbasa pastrami, meatball chislic pork venison cupim ribeye jerky tri-tip tongue. Strip steak shoulder biltong, salami cupim burgdoggen capicola fatback. Frankfurter sausage pork chop tongue chicken.')
      ],
      [
        'title' => $this->t('title 3'),
        'description' => $this->t('Bacon ipsum dolor amet jerky fatback porchetta, pork belly sirloin bresaola t-bone burgdoggen kielbasa picanha buffalo. Fatback kielbasa pastrami, meatball chislic pork venison cupim ribeye jerky tri-tip tongue. Strip steak shoulder biltong, salami cupim burgdoggen capicola fatback. Frankfurter sausage pork chop tongue chicken. ')
      ],
      [
        'title' => $this->t('title 4'),
        'description' => $this->t('Bacon ipsum dolor amet jerky fatback porchetta, pork belly sirloin bresaola t-bone burgdoggen kielbasa picanha buffalo. Fatback kielbasa pastrami, meatball chislic pork venison cupim ribeye jerky tri-tip tongue. Strip steak shoulder biltong, salami cupim burgdoggen capicola fatback. Frankfurter sausage pork chop tongue chicken. ')
      ]
    ];

    /**
     * <div clase="container">
     *    [items]
     * </div>
     */
    $build = [
      '#prefix' => '<div class="container">',
      '#suffix' => '</div>',
      'items' => [],
      '#attached' => [
        'library'=>[
          'cargar_css_y_js/css_y_js_del_modulo',
          'cargar_css_y_js/axios',
          'cargar_css_y_js/fontawesome'
        ]
      ]
    ];

    foreach($items as $item){
      $build['items'][] = [
        '#theme' => 'item_accordion',
        '#title' => $item['title'],
        '#description' => $item['description']
      ];
    }

    return $build;
  }

}
