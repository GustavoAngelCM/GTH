<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

class Google_Service_CloudTrace_NetworkEvent extends Google_Model
{
  public $compressedMessageSize;
  public $messageId;
  public $time;
  public $type;
  public $uncompressedMessageSize;

  public function setCompressedMessageSize($compressedMessageSize)
  {
    $this->compressedMessageSize = $compressedMessageSize;
  }
  public function getCompressedMessageSize()
  {
    return $this->compressedMessageSize;
  }
  public function setMessageId($messageId)
  {
    $this->messageId = $messageId;
  }
  public function getMessageId()
  {
    return $this->messageId;
  }
  public function setTime($time)
  {
    $this->time = $time;
  }
  public function getTime()
  {
    return $this->time;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setUncompressedMessageSize($uncompressedMessageSize)
  {
    $this->uncompressedMessageSize = $uncompressedMessageSize;
  }
  public function getUncompressedMessageSize()
  {
    return $this->uncompressedMessageSize;
  }
}