<?php
/**
 * Tests for beans_compile_css_fragments()
 *
 * @package Beans\Framework\Tests\Unit\API\Compiler
 *
 * @since   1.5.0
 */

namespace Beans\Framework\Tests\Unit\API\Compiler;

use Beans\Framework\Tests\Unit\API\Compiler\Includes\Compiler_Test_Case;

require_once __DIR__ . '/includes/class-compiler-test-case.php';

/**
 * Class Test_BeansCompileCssFragments
 *
 * @package Beans\Framework\Tests\Unit\API\Compiler
 * @group   api
 * @group   api-compiler
 */
class Test_BeansCompileCssFragments extends Compiler_Test_Case {

	/**
	 * Test beans_compile_css_fragments() should return false when no fragments are given.
	 */
	public function test_should_return_false_when_no_fragments_given() {
		$this->assertFalse( beans_compile_css_fragments( 'foo', '' ) );
		$this->assertFalse( beans_compile_css_fragments( 'foo', [] ) );
		$this->assertFalse( beans_compile_css_fragments( 'foo', [], [ 'arg' => '' ] ) );
	}
}
