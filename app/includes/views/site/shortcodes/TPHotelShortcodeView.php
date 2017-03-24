<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 22.03.17
 * Time: 12:58 PM
 */

namespace app\includes\views\site\shortcodes;

use \app\includes\TPPlugin;
use \app\includes\common\TPCurrencyUtils;
use \app\includes\common\TPLang;

class TPHotelShortcodeView extends TPShortcodeView
{
    public function renderTable($args = array()) {
        $defaults = array(
            'rows' => array(),
            'city' => false,
            'title' => '',
            'paginate' => true,
            'off_title' => '',
            'type' => 'all',
            'day' => 3,
            'star' => 'all',
            'rating_from' => 7,
            'rating_to' => 10,
            'distance_from' => 0,
            'distance_to' => 3,
            'number_results' => 20,
            'currency' => TPCurrencyUtils::getDefaultCurrency(),
            'return_url' => false,
            'language' => TPLang::getLang(),
            'type_selections' => 'popularity',
            'subid' => '',
            'shortcode' => false,
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $html = '';
        if ($shortcode == false) return false;

        if (count($rows) < 1 || $rows == false) return $this->renderViewIfEmptyTable();

        $html .= '<div class="TP-Plugin-Tables_wrapper clearfix TP-HotelsTableWrapper">'
                        .$this->renderTitleTable($off_title, $title, $shortcode, $city)
                    .'<table class="TPTableShortcode TP-Plugin-Tables_box  TP-rwd-table TP-rwd-table-avio"
                        data-paginate="'.$paginate.'"
                        data-paginate_limit="'.TPPlugin::$options['shortcodes'][$type]['paginate']
                        .'" data-sort_column="'.$sort_column.'">'
                        //.$this->renderHeadTable($type, $one_way)
                        //.$this->renderBodyTable($type, $one_way, $rows, $origin_iata, $destination_iata, $origin, $destination, $limit, $subid, $currency)
                    .'</table>
                </div>';

        return $html;
    }

    public function renderViewIfEmptyTable(){
        return 'Empty table';
    }

    public function renderTitleTable($off_title, $title, $shortcode, $city){
        return 'Title';
    }
}