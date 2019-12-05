@extends('layouts.main')

    @section('title','SIPENTUR | Rekomendasi Gedung')

    @section('container')
        <div style="text-align: center; font-family: Bookman Old Style; font-size:30px">Rekomendasi Gedung</div>

        <li role="presentation" class="dropdown">
            <a id="drop4" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                        Dropdown
                        <span class="caret"></span>
                    </a>
            <ul id="menu6" class="dropdown-menu animated fadeInDown" role="menu">
              <li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Action</a>
              </li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Another action</a>
              </li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Something else here</a>
              </li>
              <li role="presentation" class="divider"></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Separated link</a>
              </li>
            </ul>
          </li>
        </div>
    @endsection