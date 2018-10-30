export default class AppService {
	
	/**
	 * reuest validation
	 * @param httpAddress
	 * @returns {Promise<any>}
	 */
	static requestValidation (httpAddress) {
		const expression = /[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?/gi;
		const regex = new RegExp(expression);
		
		return new Promise((resolve, reject) => {
			if (httpAddress.match(regex)) {
				resolve(httpAddress);
			} else {
				reject('Address is not valid');
			}
		})
	}
}