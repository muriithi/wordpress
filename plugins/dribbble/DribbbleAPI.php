class DribbbleAPI{
    // url to Dribbble api  
    protected $apiUrl = 'http://api.dribbble.com/';  
      
    // Dribbble username or user id  
    protected $user; 
    public function __construct($user) {
        $this->user = $user;
    }
    
    //Query REST API
    public function getPlayerShots($perPage = 15) {  
        $user = $this->user;  
          
        $json = wp_remote_get($this->apiUrl . 'players/' . $user . '/shots?per_page=' . $perPage);  
          
        $array = json_decode($json['body']);  
          
        $shots = $array->shots;  
          
        return $shots;
    }
        


}