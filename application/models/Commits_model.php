<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commits_model extends CI_Model {

    protected $repository_path = '/var/lib/innuhub/repo';
    protected $repository_object;
    protected $ammiko_filename = 'amikko.png';
    
    public function __construct()
    {
        $this->repository_object = new Gitonomy\Git\Repository($this->repository_path);
    }

    public function get_recent_amikko($offset = 0, $limit = 10)
    {
		$recent_amikkos = array();

		$paths = array($this->ammiko_filename);
		$offset = 0;
		$limit = 10;
		$log = $this->repository_object->getLog('master', $paths, $offset, $limit);
		$commits = $log->getCommits();
		foreach ($commits as $commit)
		{
			$recent_amikkos[] = array(
                'message' => $commit->getMessage(),
				'file' => str_replace(
                    "\r",
                    '',
                    base64_encode(
                        $commit->getTree()->getEntry($this->ammiko_filename)->getContent()
                    )
                )
			);
		}

        return $recent_amikkos;
    }

    public function add_amikko($image_data)
    {
		file_put_contents($this->repository_path . '/' . $this->ammiko_filename, $image_data);
		$this->repository_object->run('add', array($this->ammiko_filename));
		$this->repository_object->run('commit', array('-m "' . $this->ammiko_filename . '"'));
    }
}