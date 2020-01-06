<?php

trait ObjectCoversionTrait
{
    public function toXML() {
        $xml = new SimpleXMLElement('<' . get_class($this) . '/>');
        foreach ($this->dados as $key => $value) {
            $xml->addChild($key, $value);
        }
        return $xml->asXML();
    }

    public function toJSON() {
        return json_encode($this->dados);
    }
}
