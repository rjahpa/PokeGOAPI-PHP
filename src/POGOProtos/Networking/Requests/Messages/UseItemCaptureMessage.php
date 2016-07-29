<?php
// Generated by https://github.com/bramp/protoc-gen-php// Please include protocolbuffers before this file, for example:
//   require('protocolbuffers.inc.php');
//   require('POGOProtos/Networking/Requests/Messages/UseItemCaptureMessage.php');

namespace POGOProtos\Networking\Requests\Messages {

  use POGOProtos\Inventory\Item\ItemId;
  use Protobuf;
  use ProtobufIO;
  use ProtobufMessage;


  // message POGOProtos.Networking.Requests.Messages.UseItemCaptureMessage
  final class UseItemCaptureMessage extends ProtobufMessage {

    private $_unknown;
    private $itemId = ItemId::ITEM_UNKNOWN; // optional .POGOProtos.Inventory.Item.ItemId item_id = 1
    private $encounterId = 0; // optional fixed64 encounter_id = 2
    private $spawnPointId = ""; // optional string spawn_point_id = 3

    public function __construct($in = null, &$limit = PHP_INT_MAX) {
      parent::__construct($in, $limit);
    }

    public function read($fp, &$limit = PHP_INT_MAX) {
      $fp = ProtobufIO::toStream($fp, $limit);
      while(!feof($fp) && $limit > 0) {
        $tag = Protobuf::read_varint($fp, $limit);
        if ($tag === false) break;
        $wire  = $tag & 0x07;
        $field = $tag >> 3;
        switch($field) {
          case 1: // optional .POGOProtos.Inventory.Item.ItemId item_id = 1
            if($wire !== 0) {
              throw new \Exception("Incorrect wire format for field $field, expected: 0 got: $wire");
            }
            $tmp = Protobuf::read_varint($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_varint returned false');
            $this->itemId = $tmp;

            break;
          case 2: // optional fixed64 encounter_id = 2
            if($wire !== 1) {
              throw new \Exception("Incorrect wire format for field $field, expected: 1 got: $wire");
            }
            $tmp = Protobuf::read_uint64($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_unint64 returned false');
            $this->encounterId = $tmp;

            break;
          case 3: // optional string spawn_point_id = 3
            if($wire !== 2) {
              throw new \Exception("Incorrect wire format for field $field, expected: 2 got: $wire");
            }
            $len = Protobuf::read_varint($fp, $limit);
            if ($len === false) throw new \Exception('Protobuf::read_varint returned false');
            $tmp = Protobuf::read_bytes($fp, $len, $limit);
            if ($tmp === false) throw new \Exception("read_bytes($len) returned false");
            $this->spawnPointId = $tmp;

            break;
          default:
            $limit -= Protobuf::skip_field($fp, $wire);
        }
      }
    }

    public function write($fp) {
      if ($this->itemId !== ItemId::ITEM_UNKNOWN) {
        fwrite($fp, "\x08", 1);
        Protobuf::write_varint($fp, $this->itemId);
      }
      if ($this->encounterId !== 0) {
        fwrite($fp, "\x11", 1);
        Protobuf::write_uint64($fp, $this->encounterId);
      }
      if ($this->spawnPointId !== "") {
        fwrite($fp, "\x1a", 1);
        Protobuf::write_varint($fp, strlen($this->spawnPointId));
        fwrite($fp, $this->spawnPointId);
      }
    }

    public function size() {
      $size = 0;
      if ($this->itemId !== ItemId::ITEM_UNKNOWN) {
        $size += 1 + Protobuf::size_varint($this->itemId);
      }
      if ($this->encounterId !== 0) {
        $size += 9;
      }
      if ($this->spawnPointId !== "") {
        $l = strlen($this->spawnPointId);
        $size += 1 + Protobuf::size_varint($l) + $l;
      }
      return $size;
    }

    public function clearItemId() { $this->itemId = ItemId::ITEM_UNKNOWN; }
    public function getItemId() { return $this->itemId;}
    public function setItemId($value) { $this->itemId = $value; }

    public function clearEncounterId() { $this->encounterId = 0; }
    public function getEncounterId() { return $this->encounterId;}
    public function setEncounterId($value) { $this->encounterId = $value; }

    public function clearSpawnPointId() { $this->spawnPointId = ""; }
    public function getSpawnPointId() { return $this->spawnPointId;}
    public function setSpawnPointId($value) { $this->spawnPointId = $value; }

    public function __toString() {
      return ''
           . Protobuf::toString('item_id', $this->itemId, ItemId::ITEM_UNKNOWN)
           . Protobuf::toString('encounter_id', $this->encounterId, 0)
           . Protobuf::toString('spawn_point_id', $this->spawnPointId, "");
    }

    // @@protoc_insertion_point(class_scope:POGOProtos.Networking.Requests.Messages.UseItemCaptureMessage)
  }

}