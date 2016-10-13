<?php
/**
 * Copyright (c) 2016, Amitosh Swain Mahapatra
 * Permission to use, copy, modify, and/or distribute this software for any
 * purpose with or without fee is hereby granted, provided that the above
 * copyright notice and this permission notice appear in all copies.
 *
 * THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES
 * WITH REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR
 * ANY SPECIAL, DIRECT, INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES
 * WHATSOEVER RESULTING FROM LOSS OF USE, DATA OR PROFITS, WHETHER IN AN
 * ACTION OF CONTRACT, NEGLIGENCE OR OTHER TORTIOUS ACTION, ARISING OUT OF
 * OR IN CONNECTION WITH THE USE OR PERFORMANCE OF THIS SOFTWARE.
 */

namespace OOJson;

/**
 * Contains methods for parsing JavaScript Object Notation (JSON)
 * and converting values to JSON. It can't be constructed and contains
 * no properties or constants of its own. Aside from its two method properties
 * it has no interesting functionality of its own.
 *
 * <p>
 * The Json::parse and Json::stringify methods are mere OO wrappers around native
 * PHP json implementations.
 *
 * @see       http://php.net/manual/en/book.json.php
 * </p>
 * @package   OOJson
 * @copyright 2016 Amitosh Swain Mahapatra
 * @license   ISC
 */
class JSON
{
    /**
     * The JSON class cannot be instantiated.
     */
    private function __construct()
    {

    }

    /**
     * Decodes a JSON string
     *
     * @see http://php.net/manual/en/function.json-decode.php
     *
     * @param string $json         <p>
     *                             The <i>json</i> string being decoded.
     *                             </p>
     * @param bool   $parseAsArray [optional] <p>
     *                             When <b>TRUE</b>, returned objects will be converted into
     *                             associative arrays.
     * @param int    $depth        [optional] <p>
     *                             User specified recursion depth.
     *                             </p>
     * @param int    $options      [optional] <p>
     *                             Bitmask of JSON decode options.
     *
     * @return mixed the value encoded in <i>json</i> in appropriate
     * PHP type.
     * @throws JsonException when the string cannot be decoded successfully
     * </p>
     */
    public static function parse($json, $parseAsArray = false, $depth = 512, $options = 0)
    {
        $ret = json_decode($json, $parseAsArray, $depth, $options);

        $error = json_last_error();

        if ($error != JSON_ERROR_NONE)
            throw new JSONException(json_last_error_msg(), $error);
        else return $ret;
    }

    /**
     * Returns the JSON representation of a value
     *
     * @param mixed $object  <p>
     *                       The <i>value</i> being encoded. Can be any type except a resource.
     *                       </p>
     * @param int   $options [optional] <p>
     *                       Bitmask consisting of <b>JSON_HEX_QUOT</b>,
     *                       <b>JSON_HEX_TAG</b>,
     *                       <b>JSON_HEX_AMP</b>,
     *                       <b>JSON_HEX_APOS</b>,
     *                       <b>JSON_NUMERIC_CHECK</b>,
     *                       <b>JSON_PRETTY_PRINT</b>,
     *                       <b>JSON_UNESCAPED_SLASHES</b>,
     *                       <b>JSON_FORCE_OBJECT</b>,
     *                       <b>JSON_UNESCAPED_UNICODE</b>. The behaviour of these constants
     *                       is described on the JSON constants page.
     *
     * @link http://php.net/manual/en/json.constants.php
     *       </p>
     *
     * @param int   $depth   [optional] <p>
     *                       Set the maximum depth. Must be greater than zero.
     *                       </p>
     *
     * @return string a JSON encoded string on success
     * @throws JsonException when $object cannot be converted into JSON
     *
     */
    public static function stringify($object, $options = 0, $depth = 512)
    {
        $json = json_encode($object, $options, $depth);

        $error = json_last_error();

        if ($error != JSON_ERROR_NONE)
            throw new JSONException(json_last_error_msg(), $error);
        else
            return $json;
    }
}
