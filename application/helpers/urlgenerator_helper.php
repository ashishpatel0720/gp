<?php
/**
 * generateUrl
 *
 * Url Generator for various routes
 *
 * @access	public
 * @param	type	name
 * @return	type
 */

if (! function_exists('generateUrl')) {
    function generateUrl($controller, $path)
    {
        $ci =& get_instance();

        if (!empty($ci->config->item('routes'))) {
            $route_table = $ci->config->item('routes');
            if (!isset($route_table['routes'][$path])) {
                return site_url(array($route_table[$controller]['controller'],$route_table[$controller]['routes'][$path]));
            } else {
                return null;
            }
        }
    }
}
