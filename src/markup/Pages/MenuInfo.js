import React, {Component} from 'react';
import { Link } from  'react-router-dom';
import { useEffect } from 'react';
import { useParams } from 'react-router-dom';
function MenuInfo(){
	let params= useParams();

	useEffect(()=>{
		console.log(params);
	},[])
}