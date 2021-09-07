<?php
if (!defined('DMS')) {
    die('Forbidden');
}

/**
 * @var string $id
 * @var  array $option
 * @var  array $data
 */ {
    $div_attr = $option['attr'];

    unset(
            $div_attr['value'], $div_attr['name']
    );
}
$group_name = null;
if (!empty($option['groupname'])) {
    $group_name = $option['groupname'];
}
?>
<div <?php echo dms_attr_to_html($div_attr) ?>>
    <div class="dms-multi-inline-group">
        <?php
        foreach ($option['value'] as $key => $options_group) {

            $type = $option['dms_multi_options'][$key]['type'];
            $html = '';


            // short text
            if ($type === 'short-text') {


                $html .= '<div class="dms-multi-inline-holder dms-multi-holding-text">';
                $html .= '<span class="dms-multi-inline-title">' . $option['dms_multi_options'][$key]['title'] . '</span>';

                $html .= dms()->backend->option_type('short-text')->render(
                        $key, array(
                    'type' => 'short-text',
                    'value' => dms_akg($key, $option['value']),
                    'attr' => array(
                        'data-dmsmultioptions' => $group_name
                    )
                        ), array(
                    'value' => dms_akg($key, $data['value']),
                    'id_prefix' => $option['attr']['id'] . '-',
                    'name_prefix' => $option['attr']['name'],
                        )
                );

                $html .= '</div>';
            }

            // text
            if ($type === 'text') {


                $html .= '<div class="dms-multi-inline-holder dms-multi-holding-text">';
                $html .= '<span class="dms-multi-inline-title">' . $option['dms_multi_options'][$key]['title'] . '</span>';

                $html .= dms()->backend->option_type('text')->render(
                        $key, array(
                    'type' => 'short-text',
                    'value' => dms_akg($key, $option['value']),
                    'attr' => array(
                        'data-dmsmultioptions' => $group_name
                    )
                        ), array(
                    'value' => dms_akg($key, $data['value']),
                    'id_prefix' => $option['attr']['id'] . '-',
                    'name_prefix' => $option['attr']['name'],
                        )
                );

                $html .= '</div>';
            }


            // color
            if ($type === 'color') {


                $html .= '<div class="dms-multi-inline-holder dms-multi-holding-text">';
                $html .= '<span class="dms-multi-inline-title">' . $option['dms_multi_options'][$key]['title'] . '</span>';

                $html .= dms()->backend->option_type('color-picker')->render(
                        $key, array(
                    'type' => 'color-picker',
                    'value' => dms_akg($key, $option['value']),
                    'attr' => array(
                        'data-dmsmultioptions' => $group_name
                    )
                        ), array(
                    'value' => dms_akg($key, $data['value']),
                    'id_prefix' => $option['attr']['id'] . '-',
                    'name_prefix' => $option['attr']['name'],
                        )
                );

                $html .= '</div>';
            }



            // rgba color
            if ($type === 'rgbacolor') {


                $html .= '<div class="dms-multi-inline-holder dms-multi-holding-text">';
                $html .= '<span class="dms-multi-inline-title">' . $option['dms_multi_options'][$key]['title'] . '</span>';

                $html .= dms()->backend->option_type('rgba-color-picker')->render(
                        $key, array(
                    'type' => 'rgba-color-picker',
                    'value' => dms_akg($key, $option['value']),
                    'attr' => array(
                        'data-dmsmultioptions' => $group_name
                    )
                        ), array(
                    'value' => dms_akg($key, $data['value']),
                    'id_prefix' => $option['attr']['id'] . '-',
                    'name_prefix' => $option['attr']['name'],
                        )
                );

                $html .= '</div>';
            }


            // short select
            if ($type === 'short-select') {

                $html .= '<div class="dms-multi-inline-holder dms-multi-holding-select">';
                $html .= '<span class="dms-multi-inline-title">' . $option['dms_multi_options'][$key]['title'] . '</span>';
                $html .= dms()->backend->option_type('short-select')->render(
                        $key, array(
                    'type' => 'short-select',
                    'value' => dms_akg($key, $option['value']),
                    'choices' => dms_akg($key . '/choices', $option['dms_multi_options']),
                    'attr' => array(
                        'data-dmsmultioptions' => $group_name
                    )
                        ), array(
                    'value' => dms_akg($key, $data['value']),
                    'id_prefix' => $option['attr']['id'] . '-',
                    'name_prefix' => $option['attr']['name'],
                        )
                );

                $html .= '</div>';
            }

            // select
            if ($type === 'select') {

                $html .= '<div class="dms-multi-inline-holder dms-multi-holding-select">';
                $html .= '<span class="dms-multi-inline-title">' . $option['dms_multi_options'][$key]['title'] . '</span>';
                $html .= dms()->backend->option_type('select')->render(
                        $key, array(
                    'type' => 'select',
                    'value' => dms_akg($key, $option['value']),
                    'choices' => dms_akg($key . '/choices', $option['dms_multi_options']),
                    'attr' => array(
                        'data-dmsmultioptions' => $group_name
                    )
                        ), array(
                    'value' => dms_akg($key, $data['value']),
                    'id_prefix' => $option['attr']['id'] . '-',
                    'name_prefix' => $option['attr']['name'],
                        )
                );

                $html .= '</div>';
            }

            echo  kinter_return($html);
        }
        ?>
    </div>
</div>