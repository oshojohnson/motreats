import React, { useEffect,useState} from 'react';
import axios from 'axios';
import GetMenu from './GetMenu';	
//Images	

function RightMenu(){
	const [menus,getMenus]=useState('');
	const url = 'https://www.motreats.ng/api/process.php?get_menus='+1
	useEffect(()=> {
		getAllMenus();
	},[]);
	const getAllMenus=()=>{
		axios.get(url)
		.then((response)=>{
			const allMenus = response.data.products;
			getMenus(allMenus);
		})
		.catch(error=>console.error('Error: {error}'));
	}

  		return(
  			<>
  				<GetMenu menus={menus}/>
  				
			</>

  		);
} 
export default RightMenu;
