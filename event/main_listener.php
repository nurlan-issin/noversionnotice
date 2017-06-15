<?php
/**
 *
 * Disable phpBB version update notice. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2017, Nurlan Issin
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace nissin\noversionnotice\event;

/**
 * @ignore
 */
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Disable phpBB version update notice Event listener.
 */
class main_listener implements EventSubscriberInterface
{
	/** @var \phpbb\template\template */
	protected $template;

	public function __construct(\phpbb\template\template $template)
	{
		$this->template = $template;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.acp_main_notice'	=> 'phpbb_version',
		);
	}

	/**
	 * Modifies the S_VERSION_UP_TO_DATE on ACP index
	 *
	 * @param \phpbb\event\data	$event	Event object
	 */
	public function phpbb_version($event)
	{
		$this->template->assign_var('S_VERSION_UP_TO_DATE', true);
	}
}
