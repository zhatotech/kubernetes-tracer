<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_images extends CI_Controller {

    function simpan_gambar() {
        $config['upload_path'] = './assets/image_temp/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 3000;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file')) {
            $this->output->set_header('Gagal Upload');
            exit;
        } else {
            $file = $this->upload->data();
            $this->output
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode(['location' => base_url().'assets/image_temp/'.$file['file_name']]))
                ->_display();
            exit;
        }
    }

}