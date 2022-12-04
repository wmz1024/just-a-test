<?php
//得到每一个url，获取其中的icon
            $url = $_GET['subject'];
            $contents = @file_get_contents($url);
            preg_match('/<link rel=".*?icon".*?href="(.*?)".*?>/', $contents,$icon);
            if(!empty($icon)){
                // print_r($icon[1]);
                echo "<br/>";
                $array = @get_headers($icon[1],1);
                if(preg_match('/200/',$array[0])){
                    // echo "<pre/>";
                    print_r($icon[1]);
                    echo "<img src='".$icon[1]."' style='width:16px;height:16px;'>";
                    // echo "string";
                    // print_r($array);
                }else{
                    //去掉多余的斜杠
                    $url = substr_replace($url,"",-1);
                    echo "无效url资源！".$url.$icon[1];
                    echo "<img src='".$url.$icon[1]."' style='width:16px;height:16px;'>";
                }

            }else{
                //这里笔者试了很多种方法，后来发现通过url可以入手，从url截取网址的根目录，由于习惯性的把文件名名为favicon.ico，所以可以直接访问类似这样的url得到图标文件，http://wenwen.sogou.com/favicon.ico
                $url=substr($url,7);//去除前面
                $position = strpos($url, '/');
                $url=substr($url,0,$position);
                echo "<img src='http://".$url."/favicon.ico' style='width:16px;height:16px;'><br/>";
                // echo $url."/favicon.ico<br/>";
                //判断网站的根目录是否存在.icon文件
                // $url='http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
                // echo dirname($url);
                // if(file_exists("favicon.ico"))
                //     echo "<p>存在</p>";
            }
            ?>
