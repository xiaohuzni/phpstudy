package com.cn.action;

import java.util.Map;

import com.cn.model.User;
import com.opensymphony.xwork2.Action;
import com.opensymphony.xwork2.ActionContext;
import com.opensymphony.xwork2.ActionSupport;
import com.opensymphony.xwork2.ModelDriven;
import com.opensymphony.xwork2.Preparable;

public class RegisterAction extends BaseAction {
	
	public User user;
	public User getUser() {
		return user;
	}
	public void setUser(User user) {
		this.user = user;
	}
	
	public String execute(){
		/*Map<String,Object> request=(Map<String, Object>) ActionContext.getContext().get("request");
		request.put("username", user.getUsername());*/
		request.put("username", user.getUsername());
		return Action.SUCCESS;
	}
	@Override
	public Object getModel() {		
		return this.user;
	}
	@Override
	public void prepare() throws Exception {
		if(user==null){
			user=new User();
		}
		
	}
}
