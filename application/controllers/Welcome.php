<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index() {
        $this->load->view('welcome_message_1');
    }

    public function getKeyWords($text, $isUrl) {
        $arrContextOptions = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );

        if ($isUrl) {
            $response = file_get_contents('https://6fa349f6-dec8-4bd7-a9ab-ab3a579e3999:NZP76VFjCvbd@gateway.watsonplatform.net/natural-language-understanding/api/v1/analyze?version=2017-02-27&url=' . urlencode($text) . '&features=concepts,categories,entities,keywords,sentiment,emotion,relations,metadata,semantic_roles', false, stream_context_create($arrContextOptions));
            $f = json_decode($response);
        } else {
            $response = file_get_contents('https://6fa349f6-dec8-4bd7-a9ab-ab3a579e3999:NZP76VFjCvbd@gateway.watsonplatform.net/natural-language-understanding/api/v1/analyze?version=2017-02-27&text=' . urlencode($text) . '&features=keywordsconcepts,categories,entities,keywords,sentiment,emotion,relations,metadata,semantic_roles', false, stream_context_create($arrContextOptions));

            $f = json_decode($response);

            foreach ($f->keywords as $item) {
                $item->link = 'https://console.ng.bluemix.net/catalog/?search=' . urlencode($item->text);
            }
        }
        
        return $f;
    }

    public function process() {
        header('Access-Control-Allow-Origin: *');
        $text = $_POST['text'];

        $regex = "((https?|ftp)\:\/\/)?"; // SCHEME 
        $regex .= "([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?"; // User and Pass 
        $regex .= "([a-z0-9-.]*)\.([a-z]{2,3})"; // Host or IP 
        $regex .= "(\:[0-9]{2,5})?"; // Port 
        $regex .= "(\/([a-z0-9+\$_-]\.?)+)*\/?"; // Path 
        $regex .= "(\?[a-z+&\$_.-][a-z0-9;:@&%=+\/\$_.-]*)?"; // GET Query 
        $regex .= "(#[a-z_.-][a-z0-9+\$_.-]*)?"; // Anchor 
        $isUrl = false;

        if (preg_match("/^$regex$/i", $text)) { // `i` flag for case-insensitive
            $isUrl = true;
        }

        echo json_encode($this->getKeyWords($text, $isUrl));
    }

}
