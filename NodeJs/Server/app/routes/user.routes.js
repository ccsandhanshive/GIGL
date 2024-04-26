module.exports = app => {

const users = require( "../controller/user.controller.js" ) ;
var router = require( "express" ).Router( ) ;


router.post( "/register" , users.addUser ) ;
router.post( "/login" , users.login ) ;

app.use( '/users' , router ) ;
} ;