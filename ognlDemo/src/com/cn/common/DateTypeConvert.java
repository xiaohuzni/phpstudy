package com.cn.common;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.Map;

import org.apache.struts2.util.StrutsTypeConverter;

public class DateTypeConvert extends StrutsTypeConverter {

	@Override
	public Object convertFromString(Map arg0, String[] arg1, Class arg2) {
		SimpleDateFormat sfd=new SimpleDateFormat("yyyy-MM-dd");
		Date dt=null;
		if(arg1[0]!=null){
			try {
				dt =(Date)sfd.parse(arg1[0]);
			} catch (ParseException e) {
				e.printStackTrace();
			}
		}
	
		//arg1[0];
		return dt;
		
	}

	@Override
	public String convertToString(Map arg0, Object arg1) {
		SimpleDateFormat sfd=new SimpleDateFormat("yyyyMM-dd");
		return sfd.format((Date)arg1);
	}

}
