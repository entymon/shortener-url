import axios from 'axios';
import { API_PATH } from '../config';

export default class ApiService {
	
	static getShortenUrl (originUrl, successCallback, errorCallback) {
		axios.post(`${API_PATH}/api/create`, {
			url: originUrl
		})
			.then(successCallback)
			.catch((error) => {
				errorCallback(error.response.data.error);
			});
	}
}