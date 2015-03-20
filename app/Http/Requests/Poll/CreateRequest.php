<?php
/**
 * Create request.
 *
 * @version 2.0.0
 * @author  MyBB Group
 * @license LGPL v3
 */

namespace MyBB\Core\Http\Requests\Poll;


use Illuminate\Contracts\Auth\Guard;
use MyBB\Core\Http\Requests\Request;

class CreateRequest extends Request
{
	/**
	 * The route to redirect to if validation fails.
	 *
	 * @var string
	 */
	protected $redirectRoute = 'poll.create';
	/** @var Guard $guard */
	private $guard;

	public function __construct(Guard $guard)
	{
		$this->guard = $guard;
	}

	public function rules()
	{
		return [
			'question' => 'required',
			'option' => 'required|array',
			'is_multiple' => 'boolean',
			'is_public' => 'boolean',
			'maxoptions' => 'integer|min:1',
			'timeout' => 'integer|min:0'
		];
	}

	public function authorize()
	{
		//return $this->guard->check();
		return true; // TODO: In dev return, needs replacing for later...
	}
}