<?php

namespace App\Classes;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;

class ApiResponse
{
  /**
   * Rollback database transaction
   *
   * @param   Exception $ex       Exception thrown
   * @param   string    $message  Error message
   *
   * @return  void
   */
  public static function rollback(\Exception $ex, string $message = "Something went wrong! Rolling back.")
  {
    DB::rollBack();
    self::throw($ex, $message);
  }

  public static function throw(\Exception $ex, string $message = "Something went wrong")
  {
    Log::info($ex);

    // throw new HttpResponseException(response()->json(["message" => $message], 500));
    throw new HttpResponseException(response()->json(
      [
        "message" => $message,
        "exception" =>
        [
          "message" => $ex->getMessage(),
          "trace" => $ex->getTraceAsString()
        ]
      ],
      500
    ));
  }

  /**
   * Send successful JSON response
   *
   * @param   array   $result    Response data
   * @param   string  $message   Message
   * @param   int     $httpCode  HTTP Code
   *
   * @return  string  JSON
   */
  public static function sendResponse($result, $message, $httpCode = 200)
  {
    $response =
      [
        "success" => true,
        "data"    => $result,
      ];

    if (!empty($message))
      $response["message"] = $message;

    return response()->json($response, $httpCode);
  }
}
