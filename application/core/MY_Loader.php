<?php
class MY_Loader extends CI_Loader {


    public function template($template_name, $vars = array(),$admin_logged,$return = FALSE)
    {
        if($return):
        $content  = $this->view('templates/header', $vars, $return);
		if($admin_logged) $content .= $this->view('templates/admin_nav', $vars, $return);
        $content .= $this->view($template_name, $vars, $return);
        $content .= $this->view('templates/footer', $vars, $return);

        return $content;
    else:
        $this->view('templates/header', $vars);
		if($admin_logged) $this->view('templates/admin_nav', $vars, $return);
        $this->view($template_name, $vars);
        $this->view('templates/footer', $vars);
    endif;
    }
}
?>