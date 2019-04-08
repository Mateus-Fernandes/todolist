import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Input extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
         name: ''
        };
        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }

    

    handleChange(event){
        this.setState({ name: event.target.value});
    }
    
    handleSubmit(event) {
        var handleForUpdate = this.props.handleForUpdate;
        event.preventDefault();
        if(this.state.name == ''){
            this.nameInput.focus();
        }else{
            axios.post('http://127.0.0.1:8000/api/tasks/'+this.props.todoId,{
                name: this.state.name,
                todo_id: this.props.todoId,
                status: 0
            }) // Add Task with Axios on API
            .then((res) => {
                handleForUpdate(); // Handle to update list of tasks on Parent (List.js)
                this.setState({
                    name: ''
                });
                this.nameInput.focus();
            })
        }

    }

    render() {
        
        return(
            <form onSubmit={this.handleSubmit}>
                <label>
                    <input type="text" ref={(input) => { this.nameInput = input; }} value={this.state.name} id="name" placeholder="Qual a sua tarefa?" name="name" onChange={this.handleChange}></input>
                </label>
                <button type="submit" className="inputButton">+</button>
            </form>
            
        );
    }
}