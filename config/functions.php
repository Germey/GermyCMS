<?php
    /**
     * Created by PhpStorm.
     * User: CQC
     * Date: 2015/12/6
     * Time: 16:57
     */

    if (! function_exists('assoc_to_index')) {
        /**
         * Generate a URL to a named route.
         *
         * @param  string  $route
         * @param  string  $parameters
         * @return string
         */
        function assoc_to_index(array $array) {
            if (!(count($array) >= 0)) {
                return [];
            }
            $keys = array_keys($array);
            $item_keys = array_keys($array[array_keys($array)[0]]);
            $result = [];
            foreach ($item_keys as $item_key) {
                foreach ($keys as $key) {
                    $temp[$key] = $array[$key][$item_key];
                }
                array_push($result, $temp);
            }
            return $result;
        }
    }