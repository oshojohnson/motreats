import React, { useEffect,useState} from 'react';
import axios from 'axios';
import MainMenu from './MainMenu';	
//Images	

function TopMenu(){
	const [menus,getMenus]=useState('');
	const url = 'https:/localhost/motreats/api/process.php?get_products='+1
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
  				<MainMenu menus={menus}/>
  				
			</>

  		);
} 

export default TopMenu;