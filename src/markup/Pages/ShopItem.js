import React, { useEffect,useState} from 'react';
import axios from 'axios';
import ShopMenu from './ShopMenu';	
//Images	

function ShopItem(){
	const [menus,getMenus]=useState('');
	const url = 'https://www.motreats.ng//api/process.php?get_products='+2
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
  				<ShopMenu menus={menus}/>
  				
			</>

  		);
} 

export default ShopItem;