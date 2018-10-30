import axios from 'axios';

export const API_PATH = 'http://localhost:9090';

export default class ApiService {
	
	static getShortenUrl (originUrl, successCallback, errorCallback) {
		axios.post(`${API_PATH}/api/create`, {
			url: originUrl
		})
			.then(successCallback)
			.catch((error) => {
				console.log(error);
			});
	}
}