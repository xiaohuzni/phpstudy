package com.cn.action;

import java.util.Map;

import javax.servlet.ServletContext;
import javax.websocket.Session;

import org.apache.struts2.interceptor.ApplicationAware;
import org.apache.struts2.interceptor.RequestAware;
import org.apache.struts2.interceptor.SessionAware;
import org.apache.struts2.util.ServletContextAware;

import com.opensymphony.xwork2.ActionSupport;
import com.opensymphony.xwork2.ModelDriven;
import com.opensymphony.xwork2.Preparable;

public class BaseAction  extends ActionSupport implements RequestAware,SessionAware, ModelDriven,Preparable {

	protected Map<String,Object> request;
	protected Map<String,Object> session;
	
	
	@Override
	public void prepare() throws Exception {
		// TODO Auto-generated method stub
		
	}

	@Override
	public Object getModel() {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public void setSession(Map<String, Object> session) {
		this.session=session;
		
	}

	@Override
	public void setRequest(Map<String, Object> reqest) {
		this.request=reqest;
		
	}

	

}
