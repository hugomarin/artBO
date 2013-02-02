<?php
class ArtistWorkHelper
{
	public static function selectArtistWorks ( $extra = "", $extraTables = ""   )
	{
		$connection  = Connection::getInstance();
		$retrieveUsersSql    = "SELECT artist_work_id
							         FROM user_artists_works" . $extraTables . "
								     WHERE 1 = 1
								     " . $extra;
		return $connection->query($retrieveUsersSql);		
	}
	public static function retrieveArtistWorks ( $extra  = "", $extraTables = ""  )
	{
		$users = array();
		
		$retrieveUsersResult = self::selectArtistWorks ( $extra, $extraTables  );
		
		while($userRow = mysql_fetch_assoc($retrieveUsersResult["query"]))
			$users[] = new ArtistWork($userRow["artist_work_id"]);
			
		return $users;
	}
}
?>