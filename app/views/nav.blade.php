<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="<?=URL::to('/'); ?>">Tétrico - Beta</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li>
               		<a href="<?=URL::to('/'); ?>">Relatos</a>
                </li>
                @if(Auth::check())
                <?php
                	$num = count($enviados = DB::table('enviados')->where('leido','==','0')->get());
                ?>
                @endif
                <li>
                	<a href="<?=URL::to('enviar'); ?>">Enviar relato</a>
                </li>
                <li>
                	<a href="<?=URL::to('/'); ?>">Blog</a>
                </li>
                @if(Auth::check())
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->id_personal }} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                           <a href="<?=URL::to('/rev_enviados'); ?>"><i class="fa fa-fw fa-envelope"></i>{{$num." nuevos relatos"}}
                           </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </nav>