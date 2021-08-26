{
	"authHost": "127.0.0.1",
	"authEndpoint": "/broadcasting/auth",
	"clients": [
		{
			"appId": "9d55a9c7115b2003",
			"key": "d7f0b60ce4481407f3a8f0840a0f88c9"
		}
	],
	"database": "redis",
	"databaseConfig": {
		"redis": {},
		"sqlite": {
			"databasePath": "/database/laravel-echo-server.sqlite"
		}
	},
	"devMode": true,
	"host": null,
	"port": "6001",
	"protocol": "http",
	"socketio": {},
	"secureOptions": 67108864,
	"sslCertPath": "",
	"sslKeyPath": "",
	"sslCertChainPath": "",
	"sslPassphrase": "",
	"subscribers": {
		"http": true,
		"redis": true
	},
	"apiOriginAllow": {
		"allowCors": false,
		"allowOrigin": "",
		"allowMethods": "",
		"allowHeaders": ""
	}
}