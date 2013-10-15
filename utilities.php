<?php
	/*to remove integer indexed copies of results from PDO */
	function trim_result(&$res)
	{
		$i=0;
		while(isset($res[$i]))
		{
			$array=&$res[$i];
			$j=0;
			while(isset($array[$j]))
			{
				unset($array[$j]);
				$j++;
			}
			$i++;
		}
	}
	/*insert variable values into queries */
	function values_to_query($file,$param)
	{
		$query=file_get_contents($file);
		$keys=array_keys($param);
		$i=0;
		while(isset($keys[$i]))
		{
			$query=str_replace(':'.$keys[$i],$param[$keys[$i]],$query,$count);
			$i++;
		}
		return $query;
	}
	function construct_html($data,$file)
	{
		$i=0;
		$html='';
		while(isset($data[$i]))
		{
			$thumb=values_to_query($file,$data[$i]); 
			$html.=$thumb;
			$i++;
		}
		return $html;
	}
	function reindex($arr,$var)
	{
		$i=0;
		$x=array();
		while(isset($arr[$i]))
		{
			$x[$arr[$i][$var]]=$arr[$i];
			unset($x[$arr[$i][$var]][$var]);
			$i++;
		}
		return $x;
	}
?>
