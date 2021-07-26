<?php

     function GetHttpStatusCode($url){ 

         $curl = curl_init();

         curl_setopt($curl,CURLOPT_URL,$url);//获取内容url 

         curl_setopt($curl,CURLOPT_HEADER,1);//获取http头信息 

         curl_setopt($curl,CURLOPT_NOBODY,1);//不返回html的body信息 

         curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);//返回数据流，不直接输出 

         curl_setopt($curl,CURLOPT_TIMEOUT,30); //超时时长，单位秒 

         curl_exec($curl);

         $rtn= curl_getinfo($curl,CURLINFO_HTTP_CODE);

         curl_close($curl);

         return  $rtn;

     }

     $url = $argv[1];
     $code = GetHttpStatusCode($url); 
   $txt = "您当前监测的网站状态为: $code";
     echo $txt;      
     $myfile = fopen("email.txt", "w") or die("Unable to open file!"); 
fwrite($myfile, $txt);
fclose($myfile);                                                                                                              

 ?>
