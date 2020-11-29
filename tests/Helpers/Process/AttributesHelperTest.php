<?php

namespace Jlbelanger\LaravelJsonApi\Tests\Helpers\Process;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Jlbelanger\LaravelJsonApi\Helpers\Process\AttributesHelper;
use Jlbelanger\LaravelJsonApi\Tests\TestCase;

class AttributesHelperTest extends TestCase
{
	use RefreshDatabase;

	public function convertSingularRelationshipsProvider()
	{
		return [
			'when removing a valid singular relationship' => [[
				'data' => [
					'attributes' => [],
					'relationships' => [
						'user' => null,
					],
				],
				'expected' => [
					'attributes' => [
						'user_id' => null,
					],
					'relationships' => [],
				],
			]],
			'when adding a valid singular relationship' => [[
				'data' => [
					'attributes' => [],
					'relationships' => [
						'user' => [
							'data' => [
								'id' => '123',
								'type' => 'users',
							],
						],
					],
				],
				'expected' => [
					'attributes' => [
						'user_id' => '123',
					],
					'relationships' => [],
				],
			]],
		];
	}

	/**
	 * @dataProvider convertSingularRelationshipsProvider
	 */
	public function testConvertSingularRelationships($args)
	{
		$output = $this->callPrivate(new AttributesHelper, 'convertSingularRelationships', [$args['data']]);
		$this->assertSame($args['expected'], $output);
	}
}
