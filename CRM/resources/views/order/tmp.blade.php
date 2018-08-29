 <tr>
                        <td><select name="c_name[]" id="">
							@foreach($goods as $v)
								<option value="{{$v['p_name']}}">{{$v['p_name']}}</option>
							@endforeach
						</select></div></td>
                        <td>
							<input type="text" style="width:60px;height:20px;" name="num[]"/>
							<input type="text" style="width:30px;height:20px;" name="unit[]" placeholder="单位"/>
						</td>
						<td><input type="text" style="width:60px;height:20px;" name="price[]" /></td>
						<td><input type="text" style="width:60px;height:20px;" name="discount[]"/></td>
                        <td><input type="text" style="width:60px;height:20px;" name="money[]" /></td>
                        
                      </tr>