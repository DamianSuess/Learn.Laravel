<?php

namespace App\Common;

use Illuminate\Database\Schema\Blueprint;

/**
 * Custom Database Blueprint class
 *
 * Overrides:
 *  - rememberToken()
 *  - timestamps()
 */
class CustomBlueprint extends Blueprint
{
  /**
   * Create a new auto-incrementing big integer (8-byte) column on the table.
   *
   * @param  string  $column
   * @return \Illuminate\Database\Schema\ColumnDefinition
   */
  public function id($column = 'Id')
  {
    return $this->bigIncrements($column);
  }

  /**
   * Adds the `remember_token` column to the table.
   *
   * @return \Illuminate\Database\Schema\ColumnDefinition
   */
  public function rememberToken()
  {
    return $this->string('RememberToken', 100)->nullable();
  }

  /**
   * Indicate that the remember token column should be dropped.
   *
   * @return void
   */
  public function dropRememberToken()
  {
    $this->dropColumn('remember_token');
  }

  /**
   * Add nullable creation and update timestamps to the table.
   *
   * @param  int|null  $precision
   * @return void
   */
  public function timestamps($precision = 0)
  {
    $this->timestamp('CreatedAt', $precision)->nullable();
    $this->timestamp('UpdatedAt', $precision)->nullable();
  }

  /**
   * Indicate that the timestamp columns should be dropped.
   *
   * @return void
   */
  public function dropTimestamps()
  {
    $this->dropColumn('CreatedAt', 'UpdatedAt');
  }
}
