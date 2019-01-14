var app = new Vue({
	el:'#app',
	data:{
		pwd:"password",
		SRC:'./images/show2.png',
		isShow:true,
		status:'待审核...'
	},
	methods:{
		change: function() {
			if (this.isShow) {
				this.isShow=false;
				this.status="已审核!";
				this.pwd="text";
				this.SRC="./images/no_show.png";
			}else{
				this.isShow=true;
				this.status="待审核...";
				this.pwd="password";
				this.SRC="./images/show2.png";
			}
		}
	}
});


