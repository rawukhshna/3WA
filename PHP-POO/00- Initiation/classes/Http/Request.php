<?php

namespace Inc\Http; //on peut mettre ce qu'on veut, la bonne pratique étant de mettre App\(arboresence de fichiers correspondant à la classe en question ex= App\classes\Http)

class Request
{
    public string $method;
    public string $url;
}
